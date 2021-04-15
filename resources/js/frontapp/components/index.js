import React, { Component } from 'react';
import apiClient from '../services/apiClient';
import TradingPoolLoaderLine from "./tradingPool/tradingPoolLoaderLine";
import TradingPool from "./tradingPool/tradingPool"

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
                tradingPoolChildren.push(<div className={"col-lg-3"}>
                    <TradingPool
                        key={children.id}
                        name={children.name}
                        className={"col-lg-3"}
                    />
               </div>)
            }
            tradingPoolsRender.push(<div key={index} className={"grid"}>{tradingPoolChildren}</div>)
        })

        return tradingPoolsRender;
    }

    return (
        <div id={"container"}>
            <div className={"container-right"}>
                <header className={"main-header"}>
                    <p>test</p>
                </header>
            </div>
            <div className={"container-left"}>
                <header className={"main-header"}>
                    <p>test</p>
                </header>
                <TradingPoolLoaderLine loading={loading}/>
                {renderTradingPools()}
            </div>
        </div>
    );

}

export default  Index
