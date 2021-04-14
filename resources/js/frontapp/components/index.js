import React, { Component } from 'react';
import apiClient from '../services/apiClient';

const Index = (props) => {
    const [tradingPools, setTradingPools] = React.useState([]);
    React.useEffect(() => {
        if (props.loggedIn) {
            apiClient.get('/api/trading-pools/')
                .then(response => {
                    console.log(response.data);
                    setTradingPools(response.data);
                })
                .catch(error => console.error(error));
        }
    }, []);
    const tradingPoolsList = tradingPools.map((tradingPool) =>
        <div className="trading-pool" key={tradingPool.id}>
            <div className="bottom">
                <p>{tradingPool.name}</p>
            </div>
        </div>
    );

    return (
        <div className="list-group">{tradingPoolsList}</div>
    );

}

export default  Index
