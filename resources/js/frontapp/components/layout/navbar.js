import React, { Component } from 'react'
import {Link, NavLink} from 'react-router-dom'
import axios from 'axios'
import { withRouter } from 'react-router-dom'
import apiClient from "../../services/apiClient";

const Nav = (props) => {
    const logout = () => {
        apiClient.post('/logout').then(response => {
            if (response.status === 204) {
                props.setLoggedIn(false);
                sessionStorage.setItem('loggedIn', false);
            }
        })
    };
    const authLink = props.loggedIn
        ? <button onClick={logout} className="nav-link btn btn-link">Logout</button>
        : <NavLink to='/login' className="nav-link">Login</NavLink>;

    const handleClick = (e) => {
        e.preventDefault();
        this.props.history.push('/');
    }

    return (
        <nav id={"nav-bar"}>
            <img src={"/frontapp/img/Logo.svg"} alt={"Logo"} />
            <Link to="/">Index</Link>
            {authLink}
        </nav>
    )

}

export default  withRouter(Nav)
