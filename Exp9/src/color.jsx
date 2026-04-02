import { useState, useEffect } from 'react';

function Color() {
    const [selectedColor, setSelectedColor] = useState(null);

    const buttonStyle = {
        padding: '20px 30px',
        fontSize: '18px',
        marginRight: '10px',
        borderRadius: '8px',
        cursor: 'pointer',
    };

    const handleSelect = (color) => {
        alert(`You selected ${color}`);
        setSelectedColor(color);
    };

    useEffect(() => {
        if (selectedColor) {
            document.body.style.backgroundColor = selectedColor.toLowerCase();
        } else {
            document.body.style.backgroundColor = '';
        }
    }, [selectedColor]);

    return (
        <div>
            <button style={buttonStyle} onClick={() => handleSelect('Red')}>
                Red
            </button>
            <button style={buttonStyle} onClick={() => handleSelect('Blue')}>
                Blue
            </button>
            <button style={buttonStyle} onClick={() => handleSelect('Yellow')}>
                Yellow
            </button>
            <button style={buttonStyle} onClick={() => handleSelect('Green')}>
                Green
            </button>
        </div>
    );
}
export default Color;
