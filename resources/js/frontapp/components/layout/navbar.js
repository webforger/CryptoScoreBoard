import React, { Component } from 'react'
import {Link, NavLink} from 'react-router-dom'
import axios from 'axios'
import { withRouter } from 'react-router-dom'
import apiClient from "../../services/apiClient";
import MenuItem from "./menuItem";
import MenuLogout from "./menuLogout";

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
        ? <MenuLogout logout={logout} text={"Log out"} icon={"fas fa-sign-out-alt"} />
        : <MenuItem text={"Log in"} to={"/login"} icon={"fas fa-sign-in-alt"} additionalClasses={"absolute__bottom"} />

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
                <MenuItem activeOnlyWhenExact={true} text={"Home"} to={"/"} icon={"fas fa-home"} />
                <MenuItem text={"Coffee"} to={"/coffee"} icon={"fas fa-coffee"} />
                {authLink}
            </ul>
        </nav>
    )

}

export default  withRouter(Nav)
