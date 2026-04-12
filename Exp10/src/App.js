import React, { useState } from "react";
import axios from "axios";
import "./App.css";

function App() {
  const [city, setCity] = useState("");
  const [weather, setWeather] = useState(null);
  const [error, setError] = useState("");

  const getWeather = async () => {
    if (!city) {
      alert("Please enter a city name");
      return;
    }

    try {
      setError("");

      // Step 1: Get latitude & longitude
      const geoResponse = await axios.get(
        `https://geocoding-api.open-meteo.com/v1/search?name=${city}`
      );

      if (!geoResponse.data.results) {
        setError("City not found!");
        return;
      }

      const { latitude, longitude } = geoResponse.data.results[0];

      // Step 2: Get weather data
      const weatherResponse = await axios.get(
        `https://api.open-meteo.com/v1/forecast?latitude=${latitude}&longitude=${longitude}&current_weather=true`
      );

      setWeather(weatherResponse.data.current_weather);

    } catch (err) {
      console.error(err);
      setError("Something went wrong!");
    }
  };

  return (
    <div className="container">
      <h1>Weather App</h1>

      <div className="input-group">
        <input
          type="text"
          placeholder="Enter city name"
          value={city}
          onChange={(e) => setCity(e.target.value)}
        />
        <button onClick={getWeather}>Get Weather</button>
      </div>

      <div className="weatherResult">
        {error && <p>{error}</p>}

        {weather && (
          <>
            <h2>Weather in {city}</h2>
            <p>Temperature: {weather.temperature} °C</p>
            <p>Wind Speed: {weather.windspeed} km/h</p>
            <p>Weather Code: {weather.weathercode}</p>
            <p>Time: {weather.time}</p>
          </>
        )}
      </div>
    </div>
  );
}

export default App;