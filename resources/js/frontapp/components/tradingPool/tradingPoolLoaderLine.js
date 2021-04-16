import React, { Component } from 'react'
import TradingPoolLoader from "./tradingPoolLoader";

const TradingPoolLoaderLine = (props) => {
    return (
        <div className={"row mt-3"}>
            <div className={"col-lg-3 col-md-6 mt-3"}>
                <TradingPoolLoader />
            </div>
            <div className={"col-lg-3  col-md-6 mt-3"}>
                <TradingPoolLoader />
            </div>
            <div className={"col-lg-6  col-md-12 mt-3"}>
                <TradingPoolLoader />
            </div>
        </div>
    );
}

export default  TradingPoolLoaderLine
