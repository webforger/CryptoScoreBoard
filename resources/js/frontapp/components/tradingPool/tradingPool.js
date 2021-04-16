import React, { Component } from 'react';
import {Link} from 'react-router-dom';

const TradingPool = (props) => {
    return (
        <div className={"trading-pool"} data-key={props.tradingPool.id} key={props.tradingPool.id}>
            <div className={"top"}>

            </div>
            <div className={"bottom"}>
                <Link className={"btn btn-gold f-right mt-2 mr-3"} to={"/trading-pool/" + props.tradingPool.id}>
                    VIEW
                </Link>
                <p className={"pl-3"}>
                    First to {props.tradingPool.trading_goal.value} {props.tradingPool.trading_goal.coin.alias}
                </p>
            </div>
        </div>
    );
}

export default  TradingPool
