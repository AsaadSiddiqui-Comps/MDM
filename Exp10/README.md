# Weather App

## Problem Statement
Build a React-based weather application that lets a user enter a city name and view the current weather details for that location.

## Theory
This app uses React state to store the entered city, fetched weather data, and error messages.
It first calls the Open-Meteo geocoding API to get latitude and longitude for the city.
After that, it requests live weather data from the forecast API and displays the result on the screen.
Axios is used for making asynchronous HTTP requests, and conditional rendering shows either the weather or an error message.

## Execution
1. Install dependencies:
	`npm install`
2. Start the development server:
	`npm start`
3. Open the app in your browser at:
	`http://localhost:3000`

## Output
Enter a city name, click Get Weather, and the app shows the current temperature, wind speed, weather code, and time for that city.
