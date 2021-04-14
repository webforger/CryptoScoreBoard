import React, { Component } from 'react';
import apiClient from '../services/apiClient';
import TradingPoolLoaderLine from "./tradingPool/tradingPoolLoaderLine";

const Index = (props) => {
    const [tradingPools, setTradingPools] = React.useState([]);
    const [loading, setLoading] = React.useState([true]);
    React.useEffect(() => {
        apiClient.get('/api/trading-pools/')
            .then(response => {
                setTradingPools(response.data.data);
                setLoading(false)
            })
            .catch(error => console.error(error));
    }, []);

    const renderTradingPools = () => {
        let lines = [];
        let line = [];
        let elementCounter = 0;
        for (const [key, value] of Object.entries(tradingPools)) {
            if ( elementCounter !== 0 && elementCounter % 4 === 0) {
                lines.push(line);
                line = [];
            }
            line.push(value);
            elementCounter++;
        }

        let tradingPoolsRender = [];
        lines.forEach(function(tradingPoolLine, index) {
            let tradingPoolChildren = [];
            for (const [key, children] of Object.entries(tradingPoolLine)) {
                console.log(children);
                tradingPoolChildren.push(<div key={children.id} className={"col-lg-3"}>{children.name}</div>)
            }
            tradingPoolsRender.push(<div key={index} className={"grid"}>{tradingPoolChildren}</div>)
        })

        return tradingPoolsRender;
    }

    const title = 'test';

    return (
        <div>
            <h1>{title}</h1>
            <TradingPoolLoaderLine loading={loading}/>
            {renderTradingPools()}
        </div>
    );

}

export default  Index
