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
                props.setUser('');
                sessionStorage.removeItem('token');
                sessionStorage.removeItem('user');
            }
        })
    };
    const authLink = props.user
        ? <MenuLogout logout={logout} text={"Log out"} icon={"fas fa-sign-out-alt"} name={"logout"}/>
        : <MenuItem text={"Log in"} to={"/login"} icon={"fas fa-sign-in-alt"} additionalClasses={"absolute__bottom"} name={"login"} />

    const handleClick = (e) => {
        e.preventDefault();
        this.props.history.push('/');
    }

    const adminLinks = () => {
        if( props.user && props.user.roles[0] ) {
            console.log(props.user)
            if (props.user.roles[0].name === 'admin') {
                return (<li key={'admin'}>
                            <a
                                className={"menu__item "}
                                data-cy={"menu-link_" + "admin"}
                                href={"/admin"}
                            >
                                <i className={"fas fa-user-shield"} />
                                <span>Admin</span>
                            </a>
                        </li>);
            }
        }
    }

    return (
        <nav id={"nav-bar"}>
            <input id={"menu__toggle"} type={"checkbox"}/>
            <label className={"menu__btn"} htmlFor={"menu__toggle"}>
                <span></span>
            </label>
            <ul className={"menu__box"}>
                <MenuItem activeOnlyWhenExact={true} text={"Home"} to={"/"} icon={"fas fa-home"} name={"home"} />
                <MenuItem text={"Coffee"} to={"/coffee"} icon={"fas fa-coffee"} name={"coffee"} />
                {authLink}
                {adminLinks()}
            </ul>
        </nav>
    )

}

export default  withRouter(Nav)
