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
                console.log(response)
                setTradingPools(response.data.data);
                setLoading(false)
            })
            .catch(error => console.error(error));
    }, []);

    const chunkTradingPools = () => {
        let lines = [];
        let line = [];
        let elementCounter = 0;
        for (const [key, value] of Object.entries(tradingPools)) {
            if (elementCounter !== 0 && elementCounter % 4 === 0) {
                lines.push(line);
                line = [];
            }
            line.push(value);
            elementCounter++;
        }

        return lines;
    }

    const renderTradingPools = () => {
        if ( !loading && tradingPools.length > 0) {
            let lines = chunkTradingPools();

            let tradingPoolsRender = [];
            lines.forEach(function (tradingPoolLine, index) {
                let tradingPoolChildren = [];
                for (const [key, children] of Object.entries(tradingPoolLine)) {
                    tradingPoolChildren.push(<div key={key} className={"col-lg-3 col-md-6 mt-3"}>
                        <TradingPool
                            tradingPool={children}
                        />
                    </div>)
                }
                tradingPoolsRender.push(<div data-key={index} key={index} className={"row"}>{tradingPoolChildren}</div>)
            })

            return tradingPoolsRender;
        }
        else {
            return <TradingPoolLoaderLine key={0}/>
        }
    }

    return (
        <div id={"container"}>
            <div className={"container-right"}>
                <header className={"main-header"}>
                </header>
            </div>
            <div className={"container-left px-3"}>
                <header className={"main-header"}>
                    <div className={"row"}>
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
                {renderTradingPools()}
            </div>
        </div>
    );

}

export default  Index
