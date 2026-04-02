import { createRoot } from 'react-dom/client'
import App from './App'
import Color from './color.jsx'

createRoot(document.getElementById('root')).render(
    <div>
        <App />
        <Color />
    </div>
)