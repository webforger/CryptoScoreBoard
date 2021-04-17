import React, { Component } from 'react';
import {Link} from 'react-router-dom';

const TradingPool = (props) => {
    const USERS_TO_DISPLAY = 3;
    const renderUsers = () => {
        let users = [];

        if ( Object.entries(props.tradingPool.users).length >= USERS_TO_DISPLAY) {
            let count = props.tradingPool.user_count - USERS_TO_DISPLAY;
            users.push(<p key="4" className={"profile-picture small"}>+{count}</p>)
        }

        for (const [key, user] of Object.entries(props.tradingPool.users)) {
            if(key >= USERS_TO_DISPLAY) break;
            users.push(<img className={"profile-picture small"} src={user.picture} key={key} alt={user.name}/>)
        }

        return <div className={"profile-picture-container"}>{users}</div>;
    }

    return (
        <div className={"trading-pool"} data-key={props.tradingPool.id} key={props.tradingPool.id}>
            <div className={"top"}>
                {renderUsers()}
            </div>
            <div className={"bottom"}>
                <Link data-cy={"open_trading_pool"} className={"btn btn-gold f-right mt-2 mr-3"} to={"/trading-pool/" + props.tradingPool.id}>
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
