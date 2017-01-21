ReactDOM.render(React.createElement(
  'h1',
  null,
  'Hello, world!'
), document.getElementById('root'));

class Candidate1 extends React.Component {
  constructor() {
    super();
    this.state = {
      url: null,
      name: null,
      nickname: null
    };
  }
};

class Candidate2 extends React.Component {
  constructor() {
    super();
    this.state = {
      url: null,
      name: null,
      nickname: null
    };
  }
};

var candidate1 = Candidate1;
