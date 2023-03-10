import WP_Logo from './wp.svg';
import React_Logo from './react.svg';
import './App.css';

function App() {
	return (
		<div className="App">
			<header className="App-header">
				<div>
					<img src={React_Logo} className="App-logo" alt="logo" />
					<img src={WP_Logo} className="App-logo" alt="logo" />
				</div>
				<p>
					Edit <code>src/App.js</code> and save to reload.
				</p>
				<a
					className="App-link"
					href="https://reactjs.org"
					target="_blank"
					rel="noopener noreferrer"
				>
					Learn React
				</a>
			</header>
		</div>
	);
}

export default App;
