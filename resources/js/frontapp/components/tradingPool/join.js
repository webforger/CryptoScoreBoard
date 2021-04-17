import React, { Component } from 'react';
import axios from "axios";
import {Redirect, useHistory} from "react-router-dom";

const Join = (props) => {
    const [canJoin, setCanJoin] = React.useState(props.canJoin);
    let history = useHistory();

    const joinTradingPool = () => {
        const apiAuthClient = axios.create({
            baseURL: 'http://localhost',
            withCredentials: true,
            headers: {'Authorization': 'Bearer '+ props.token}
        });

        apiAuthClient.get('/api/trading-pool/join/' + props.id)
            .then( response => {
                setCanJoin(false);
            })
            .catch( response => {
                console.error(response);
            })
    }

    if (canJoin) {
        return (
            <a className={"btn btn-primary"} onClick={joinTradingPool}>
                JOIN
            </a>
        );
    } else {
        return (<p>Inside pool</p>)
    }
}

export default  Join
