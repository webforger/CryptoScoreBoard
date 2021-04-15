import React, { Component } from 'react'

const Button = (props) => {
    return (
        <a href={props.href} className={"btn " + props.style}>
            {props.text}
        </a>
    );
}

export default  Button
