# React Hooks Color Selector and Counter (Exp9)

## Problem statement
Build a ReactJS app using functional components and hooks that demonstrates interactive UI state updates. The app should let users select colors and update a counter while using `useState` for local component state and `useEffect` for side effects (like updating document title or page background). This satisfies practical learning objectives for React Hooks and component props.

## Theory (3-4 lines)
React Hooks provide a clean way to use state and lifecycle behavior in functional components. `useState` stores dynamic values that change by user interaction. `useEffect` runs side effects when dependencies change (e.g., updating document title). Passing props lets components communicate and stay reusable.

## Project structure
- `index.html` - app entry HTML served by Vite
- `src/layout.jsx` - React root render and component composition
- `src/App.jsx` - color selection UI using `useState`
- `src/color.jsx` - color button actions and `useEffect` background side effects
- `src/App.css`, `src/index.css` - styles
- `package.json` - dependencies and scripts
- `vite.config.js` - Vite configuration

## Setup and run
1. Check Node.js + npm:
   - `node -v && npm -v`
2. Install dependencies:
   - `npm install`
3. Start app:
   - `npm run dev`