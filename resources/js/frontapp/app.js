import React from 'react'
import ReactDOM from 'react-dom'
import {  BrowserRouter as Router, Switch, Route} from 'react-router-dom';
import Index from './components/index'
import Login from './components/login'

ReactDOM.render(
    <Router>
        <Switch>
            <Route exact path='/' component={Index}/>
            <Route path='/login' component={Login}/>
        </Switch>
    </Router>,
    document.getElementById('app')
);
