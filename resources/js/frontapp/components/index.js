import React, { Component } from 'react';
import apiClient from '../services/apiClient';
import TradingPoolLoaderLine from "./tradingPool/tradingPoolLoaderLine";

const Index = (props) => {
    const [tradingPools, setTradingPools] = React.useState([]);
    const [loading, setLoading] = React.useState([true]);
    React.useEffect(() => {
        apiClient.get('/api/trading-pools/')
            .then(response => {
                console.log(response.data.data);
                setTradingPools(response.data.data);
                setLoading(false)
            })
            .catch(error => console.error(error));
    }, []);

    const tradingPoolsList = tradingPools.map((tradingPool) =>
        <div className="trading-pool" key={tradingPool.id}>
            <div className="bottom">
                <p>{tradingPool.name}</p>
            </div>
        </div>
    );
    const title = 'test';

    return (
        <div>
            <h1>{title}</h1>
            <TradingPoolLoaderLine loading={loading}/>
            <div className="grid">
                {tradingPoolsList}
            </div>
        </div>
    );

}

export default  Index
