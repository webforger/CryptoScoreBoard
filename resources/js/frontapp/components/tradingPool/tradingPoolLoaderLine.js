import React, { Component } from 'react'
import TradingPoolLoader from "./tradingPoolLoader";

const TradingPoolLoaderLine = (props) => {
    if (props.loading) {
        return (
            <div className={"grid mt-3"}>
                <div className={"col-lg-3"}>
                    <TradingPoolLoader />
                </div>
                <div className={"col-lg-3"}>
                    <TradingPoolLoader />
                </div>
                <div className={"col-lg-6"}>
                    <TradingPoolLoader />
                </div>
            </div>
        );
    } else {
        return (
            <div></div>
        )
    }
}

export default  TradingPoolLoaderLine
