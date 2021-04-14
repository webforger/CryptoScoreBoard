import React from 'react';
import { BrowserRouter as Router, Switch, Route, NavLink } from 'react-router-dom';
import Index from './components/index';
import Login from './components/login';
import Nav from './components/layout/navbar'
import apiClient from './services/apiClient';

const App = () => {
    const [loggedIn, setLoggedIn] = React.useState(
        sessionStorage.getItem('loggedIn') == 'true' || false
    );
    const login = () => {
        setLoggedIn(true);
        sessionStorage.setItem('loggedIn', true);
    };

    return (
        <Router>
            <Nav loggedIn={loggedIn} setLoggedIn={setLoggedIn}/>
            <div id={"container"}>
                <Switch>
                    <Route path='/' exact render={props => (
                        <Index {...props} loggedIn={loggedIn}/>
                    )}/>
                    <Route path='/login' render={props => (
                        <Login {...props} login={login}/>
                    )}/>
                </Switch>
            </div>
        </Router>
    )
}
export default App;
