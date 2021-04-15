import React, { Component } from 'react';
import apiClient from '../services/apiClient';
import TradingPoolLoaderLine from "./tradingPool/tradingPoolLoaderLine";
import TradingPool from "./tradingPool/tradingPool"
import Button from "./button";

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
            tradingPoolsRender.push(<div key={index} className={"grid mt-3"}>{tradingPoolChildren}</div>)
        })

        return tradingPoolsRender;
    }

    return (
        <div id={"container"}>
            <div className={"container-right"}>
                <header className={"main-header"}>
                </header>
            </div>
            <div className={"container-left"}>
                <header className={"main-header"}>
                    <div className={"grid"}>
                        <div className={"col-lg-6"}></div>
                        <div className={"col-lg-6 align-right"}>
                            <Button
                                href={"/trade"}
                                style={"btn-secondary"}
                                text={"START TRADING NOW"}
                            />
                        </div>
                    </div>
                </header>
                <TradingPoolLoaderLine loading={loading}/>
                {renderTradingPools()}
            </div>
        </div>
    );

}

export default  Index
