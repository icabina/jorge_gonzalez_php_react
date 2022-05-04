"use strict";

class Destacados extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      items: [],
    };
  }

  componentDidMount() {
    $.ajax({
      url: "models/DestacadosM.php",
      type: "GET",
      success: (response) => {
        this.setState({ items: JSON.parse(response) });
      },
    });
    const { items } = this.state;
    console.log(items);
  }

  render() {
    const { items } = this.state;

    const newItems = items.map((item) => (
      <div className="col col_2 project" key={item.id}>
        <div
          className="foto"
          style={{ backgroundImage: `url(datas/${item.mini}` }}
        >
          <a href={"proyecto/" + item.id} target="_self"></a>
        </div>
        <h3>{item.nombre}</h3>
        <h4>{item.ciudad}</h4>
        <a className="btn" href={"proyecto/" + item.id} target="_self">
          ver
        </a>

        <div dangerouslySetInnerHTML={{ __html: item.descripcion }}></div>
      </div>
    ));

    return newItems;
  }

  // render() {
  //   const { items } = this.state;

  //   const newItems = items.map((item) =>
  //     React.createElement(
  //       "div",
  //       { key: `proyecto/${item.id}`, className: "col col_2 project" },
  //       [
  //         React.createElement(
  //           "div",
  //           {
  //             className: "foto",
  //             style: { backgroundImage: `url(datas/${item.mini})` },
  //           },
  //           React.createElement(
  //             "a",
  //             {
  //               href: `proyecto/${item.id}`,
  //               target: "_self",
  //             },
  //             null
  //           )
  //         ),
  //         React.createElement("h3", {}, item.nombre),
  //         React.createElement("h4", {}, item.ciudad),
  //         React.createElement(
  //           "a",
  //           {
  //             className: "btn",
  //             href: `proyecto/${item.id}`,
  //             target: "_self",
  //           },
  //           "ver"
  //         ),
  //       ].concat(item.descripcion)
  //     )
  //   );

  //   return newItems;
  // }
}

const root = ReactDOM.createRoot(document.getElementById("destacados"));
root.render(React.createElement(Destacados, {}, null));
