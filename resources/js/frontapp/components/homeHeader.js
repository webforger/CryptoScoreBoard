import React, { Component } from 'react'
import 'react-vis/dist/style.css';
import {XYPlot, LineSeries, makeVisFlexible, GradientDefs} from 'react-vis';

const HomeHeader = (props) => {
    const FlexXYPlot=makeVisFlexible(XYPlot)

    const dataGoldPink = [
        {x: 0, y: 8},
        {x: 1, y: 5},
        {x: 2, y: 4},
        {x: 3, y: 9},
        {x: 4, y: 1},
        {x: 5, y: 7},
        {x: 6, y: 6},
        {x: 7, y: 3},
        {x: 8, y: 9},
        {x: 9, y: 11}
    ];

    const dataBluePink = [
        {x: 0, y: 2},
        {x: 1, y: 3},
        {x: 2, y: 8},
        {x: 3, y: 5},
        {x: 4, y: 4},
        {x: 5, y: 3},
        {x: 6, y: 2},
        {x: 7, y: 5},
        {x: 8, y: 3},
        {x: 9, y: 1}
    ];
    return (
        <div className={"row mb-4"}>
            <header className={"col-lg-12 px-4"} id={"home-header"}>
                <div className={"inner"}>
                    <div className={"row"}>
                        <div className={"col-lg-4 px-4"}>
                            <h1>Free pools <br/><span>Join Now totally free</span></h1>
                            <p>Trading Wars 2021</p>
                            <a className={"btn btn-secondary px-lg-5"}>JOIN NOW</a>
                        </div>
                        <div className={"col-lg-8"}>
                            <div id={"main-chart"}>
                                <FlexXYPlot>
                                    <GradientDefs>
                                        <linearGradient id="GoldPinkGradient" x1="0" x2="0" y1="0" y2="1">
                                            <stop offset="0%" stopColor="#EBA835" stopOpacity={1}/>
                                            <stop offset="100%" stopColor="#E323FF" stopOpacity={1} />
                                        </linearGradient>
                                    </GradientDefs>
                                    <GradientDefs>
                                        <linearGradient id="BluePinkGradient" x1="0" x2="0" y1="0" y2="1">
                                            <stop offset="0%" stopColor="#00FFE0" stopOpacity={1}/>
                                            <stop offset="100%" stopColor="#FF7BEA" stopOpacity={1} />
                                        </linearGradient>
                                    </GradientDefs>
                                    <LineSeries
                                        color={'url(#GoldPinkGradient)'}
                                        data={dataGoldPink}
                                        curve={'curveMonotoneX'}
                                        strokeWidth={4}
                                    />
                                    <LineSeries
                                        color={'url(#BluePinkGradient)'}
                                        data={dataBluePink}
                                        curve={'curveMonotoneX'}
                                        strokeWidth={4}
                                    />
                                </FlexXYPlot>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    );
}

export default  HomeHeader
