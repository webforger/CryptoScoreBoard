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
            <input id={"menu__toggle"} type={"checkbox"}/>
            <label className={"menu__btn"} htmlFor={"menu__toggle"}>
                <span></span>
            </label>
            <ul className={"menu__box"}>
                <li>
                    <a className={"menu__item active"} href={"#"}>
                        <i className={"fas fa-home"} />
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a className={"menu__item"} href={"#"}>
                        <i className={"fas fa-home"} />
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a className={"menu__item sign__out"} href={"#"}>
                        <i className={"fas fa-sign-out-alt"} />
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    )

}

export default  withRouter(Nav)
