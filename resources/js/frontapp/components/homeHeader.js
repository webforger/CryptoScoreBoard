import React, { Suspense } from 'react'
import SmallLoader from "./SmallLoader";
const HomeHeaderChart = React.lazy(() => import('./HomeHeaderChart'));

const HomeHeader = (props) => {
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
                                <Suspense fallback={<SmallLoader />}>
                                    <HomeHeaderChart />
                                </Suspense>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    );
}

export default  HomeHeader
