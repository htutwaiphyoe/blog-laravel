import { BrowserRouter as Router, Route, Switch } from "react-router-dom";

import Overview from "./pages/Overview/Overview";
import Detail from "./pages/Detail/Detail";
import Layout from "./pages/Layout/Layout";

const App = () => {
    return (
        <Router>
            <Layout>
                <Switch>
                    <Route path="/" exact component={Overview} />
                    <Route path="/tours/:slug" exact component={Detail} />
                </Switch>
            </Layout>
        </Router>
    );
};

export default App;
