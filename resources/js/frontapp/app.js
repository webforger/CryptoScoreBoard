import React, { Suspense } from 'react';
import { BrowserRouter as Router, Switch, Route, NavLink } from 'react-router-dom';;
import FullPageLoader from "./components/fullPageLoader";
const Index = React.lazy(() => import('./components/index'));
const Login = React.lazy(() => import('./components/login'));
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
            <Switch>
                <Suspense fallback={<FullPageLoader />}>
                    <Route path='/' exact render={props => (
                        <Index {...props} loggedIn={loggedIn}/>
                    )}/>
                    <Route path='/login' render={props => (
                        <Login {...props} login={login}/>
                    )}/>
                </Suspense>
            </Switch>
        </Router>
    )
}
export default App;
