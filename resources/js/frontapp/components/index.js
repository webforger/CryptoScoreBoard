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
        <div key={tradingPool.id}>
            <h5>{tradingPool.name}</h5>
        </div>
    );

    return (
        <div className="list-group">{tradingPoolsList}</div>
    );

}

export default  Index
