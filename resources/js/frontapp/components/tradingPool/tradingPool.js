import React, { Component } from 'react'

const TradingPool = (props) => {
    return (
        <div className={"trading-pool"}>
            <div className={"top"}>

            </div>
            <div className={"bottom"}>
                <p>{props.name}</p>
            </div>
        </div>
    );
}

export default  TradingPool
