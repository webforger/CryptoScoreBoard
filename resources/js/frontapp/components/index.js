import React, { Component } from 'react';
import apiClient from '../services/apiClient';

const Index = (props) => {
    const [tradingPools, setTradingPools] = React.useState([]);
    React.useEffect(() => {
        if (props.loggedIn) {
            apiClient.get('/api/trading-pools/')
                .then(response => {
                    console.log(response.data.data);
                    setTradingPools(response.data.data);
                })
                .catch(error => console.error(error));
        }
    }, []);
    let tradingPoolsList = tradingPools.map((tradingPool) =>
        <div className="trading-pool" key={tradingPool.id}>
            <div className="bottom">
                <p>{tradingPool.name}</p>
            </div>
        </div>
    );
    let title = 'test';
    /**const tradingPoolsList = tradingPools.each(function() {

    })**/

    return (
        <div>
            <h1>{title}</h1>
            <div className="grid">
                {tradingPoolsList}
            </div>
        </div>
    );

}

export default  Index
