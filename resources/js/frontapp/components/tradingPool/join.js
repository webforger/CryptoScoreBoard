import React, { Component } from 'react';
import axios from "axios";

const Join = (props) => {
    const apiAuthClient = axios.create({
        baseURL: 'http://localhost',
        withCredentials: true,
        headers: {'Authorization': 'Bearer '+ token}
    });

    apiAuthClient.get('/api/trading-pool/join/' + props.id)
        .then( response => {
        })
        .catch( response => {

        })

    if(props.canJoin) {
        return (
            <a className={"btn btn-primary"}>
                JOIN
            </a>
        );
    } else {
        return (<p>Inside pool</p>)
    }
}

export default  Join
