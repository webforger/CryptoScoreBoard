import React, { Suspense } from 'react';
import { BrowserRouter as Router, Switch, Route, NavLink } from 'react-router-dom';;
import FullPageLoader from "./components/fullPageLoader";
import Nav from './components/layout/navbar'
import axios from "axios";
const Index = React.lazy(() => import('./components/index'));
const Login = React.lazy(() => import('./components/login'));
const TradingPoolPage = React.lazy(() => import('./components/tradingPoolPage'));

const App = () => {
    const [loggedIn, setLoggedIn] = React.useState(
        sessionStorage.getItem('loggedIn') == 'true' || false
    );
    const [token, setToken] = React.useState(
        sessionStorage.getItem('token') || ''
    );
    const [user, setUser] = React.useState(
        JSON.parse(localStorage.getItem('user')) || ''
    );
    const login = (token) => {
        setLoggedIn(true);
        setToken(token);
        sessionStorage.setItem('loggedIn', true);
        localStorage.setItem('token', token);
        const apiAuthClient = axios.create({
            baseURL: 'http://localhost',
            withCredentials: true,
            headers: {'Authorization': 'Bearer '+ token}
        });

        apiAuthClient.get('/api/auth/me')
            .then( response => {
                console.log("setUser" + JSON.stringify(response.data));
                setUser(response.data);
                localStorage.setItem('user', JSON.stringify(response.data));
            })
            .catch( response => {
                console.error("Unable to fetch permissions : " + response);
            })
    };

    return (
        <Router>
            <Nav loggedIn={loggedIn} setLoggedIn={setLoggedIn}/>
            <Switch>
                <Suspense fallback={<FullPageLoader />}>
                    <Route path='/' exact render={props => (
                        <Index {...props} user={user}/>
                    )}/>
                    <Route path='/login' render={props => (
                        <Login {...props} login={login}/>
                    )}/>
                    <Route path="/trading-pool/:id" exact={true} children={<TradingPoolPage user={user}/>} />
                </Suspense>
            </Switch>
        </Router>
    )
}
export default App;
