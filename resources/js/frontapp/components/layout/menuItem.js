import React, { Component } from 'react'
import { withRouter } from 'react-router-dom'
import {Route} from 'react-router';
const MenuItem = ({ icon, text, to, activeOnlyWhenExact, additionalClasses }) => {
    return (
        <Route
            path={to}
            exact={activeOnlyWhenExact}
            children={({match, history}) => (
                <li key={to}>
                    <a
                        className={"menu__item " + additionalClasses + " " + (match ? 'active' : '')}
                        onClick={() => {
                            history.push(to);
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

export default MenuItem;
