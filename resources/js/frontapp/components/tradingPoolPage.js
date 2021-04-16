import React, { Component } from 'react';
import Button from "./button";
import {useParams} from "react-router-dom";
import apiClient from "../services/apiClient";
import TradingPool from "./tradingPool/tradingPool";
import TradingPoolLoader from "./tradingPool/tradingPoolLoader";

const TradingPoolPage = (props) => {
    const [tradingPools, setTradingPools] = React.useState([]);
    const [loading, setLoading] = React.useState([true]);
    let { id } = useParams();

    React.useEffect(() => {
        apiClient.get('/api/trading-pool/' + id)
            .then(response => {
                console.log(response.data)
                setTradingPools(response.data);
                setLoading(false)
            })
            .catch(error => console.error(error));
    }, []);

    const renderTradingPool = () => {
        if (loading) {
            return <TradingPoolLoader />
        } else {
            return <TradingPool tradingPool={tradingPools} />
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
                <h1>{id}</h1>
                {renderTradingPool()}
            </div>
        </div>
    );

}

export default  TradingPoolPage
