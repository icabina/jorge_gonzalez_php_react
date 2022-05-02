"use strict";

const root = ReactDOM.createRoot(document.getElementById("destacados"));

class Destacados extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
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
    const { items } = this.state;

    const listItems = items.map((item) =>
      React.createElement("div", { className: "col col_2 project" }, [
        React.createElement(
          "div",
          {
            className: "foto",
            style: { backgroundImage: `url(datas/${item.mini})` },
          },
          React.createElement(
            "a",
            {
              href: `proyecto/${item.id}`,
              target: "_self",
            },
            null
          )
        ),
        React.createElement("h3", {}, item.nombre),
        React.createElement("h4", {}, item.ciudad),
        React.createElement(
          "a",
          {
            className: "btn",
            href: `proyecto/${item.id}`,
            target: "_self",
          },
          "ver"
        ),
        React.createElement("p", {}, item.descripcion),
      ])
    );
    return listItems;
  }
}

root.render(React.createElement(Destacados, {}, null));
