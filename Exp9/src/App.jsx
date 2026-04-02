import { useState } from 'react'

function App() {
  const [selectedColor, setSelectedColor] = useState(null)

  const buttonStyle = {
    padding: '20px 30px',
    fontSize: '18px',
    marginRight: '10px',
    borderRadius: '8px',
    cursor: 'pointer'
  }

  return (
    <div>
      <button style={buttonStyle} onClick={() => setSelectedColor('Red')}>Red</button>
      <button style={buttonStyle} onClick={() => setSelectedColor('Blue')}>Blue</button>
      <button style={buttonStyle} onClick={() => setSelectedColor('Yellow')}>Yellow</button>
      <button style={buttonStyle} onClick={() => setSelectedColor('Green')}>Green</button>
      {selectedColor && <p>You selected {selectedColor}</p>}
    </div>
  )
}
export default App;