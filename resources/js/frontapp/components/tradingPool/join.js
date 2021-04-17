import React, { Component } from 'react';
import {Link} from 'react-router-dom';

const Join = (props) => {

    console.log(props.canJoin)
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
