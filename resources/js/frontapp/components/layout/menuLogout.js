import React, { Component } from 'react'
import { withRouter } from 'react-router-dom'
import {Route} from 'react-router';
const MenuLogout = ({ icon, text, to, activeOnlyWhenExact, logout }) => {
    return (
        <Route
            path={to}
            exact={activeOnlyWhenExact}
            children={({match, history}) => (
                <li>
                    <a
                        className={"menu__item absolute__bottom"}
                        onClick={() => {
                            logout()
                        }}
                    >
                        <i className={icon} />
                        <span>{text}</span>
                    </a>
                </li>
            )}
        />
    );
};

export default MenuLogout;
