"use strict";

const root = ReactDOM.createRoot(document.getElementById("destacados"));

class Destacados extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      error: null,
      isLoaded: false,
      items: [],
    };
  }

  componentDidMount() {
    $.ajax({
      url: "models/destacados.php",
      type: "GET",
      success: (response) => {
        this.setState({ items: JSON.parse(response) });
      },
    });
  }

  render() {
    const { error, isLoaded, items } = this.state;

    const listItems = items.map((item) =>
      React.createElement("div", { className: "col col_2" }, [
        React.createElement("h2", {}, item.nombre),
        React.createElement("h3", {}, item.descripcion),
        React.createElement("h3", {}, item.categoria),
      ])
    );
    return listItems;
  }
}

root.render(React.createElement(Destacados, {}, null));
