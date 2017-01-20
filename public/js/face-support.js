ReactDOM.render(
  <h1>Hello, world!</h1>,
  document.getElementById('root')
);

class Candidate1 extends React.Component  {
  constructor() {
    super();
    this.state = {
      cphoto: null,
      curl: null,
      cname: null,
      cnickname: null,
      vcphoto: null,
      vcurl: null,
      vcname: null,
      vcnickname: null
    }
  };
  render()  {
    return(
      <div class="col-md-3">
        <div class="panel panel-default" >
          <div class="panel-body">
            <div class="head">
              <img src={this.state.cphoto} alt=""/>
              <h3><strong>{this.state.cname}</strong></h3>
              <div class="g-plusone" data-size="tall" data-href="https://wikikandidat.com/{this.state.curl}" data-annotation="inline"></div>
            </div>
          </div>
        </div>

        <h5><strong>Ceritakan pengalaman pribadi kamu dengan {this.state.cnickname}, bisa sebagai tetangganya, keluarganya, rekan kerjanya, warga daerah yang pernah dia pimpin, atau apapun.</strong></h5>
        <div class="fb-comments" data-href="https://wikikandidat.com/{this.state.curl}" data-width="335" data-numposts="2"></div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-default" >
          <div class="panel-body">
            <div class="head">
              <img src={this.state.vcphoto} alt="">
              <h3><strong>{this.state.vcname}</strong></h3>
              <div class="g-plusone" data-size="tall" data-href="https://wikikandidat.com/{this.state.curl}" data-annotation="inline"></div>
            </div>
          </div>
        </div>

        <h5><strong>Ceritakan pengalaman pribadi kamu dengan {this.state.vcnickname}, bisa sebagai tetangganya, keluarganya, rekan kerjanya, warga daerah yang pernah dia pimpin, atau apapun.</strong></h5>
        <div class="fb-comments" data-href="https://wikikandidat.com/{this.state.vcurl}" data-width="335" data-numposts="2"></div>
      </div>
    );
  }
};

class Candidate2 extends React.Component  {
  constructor() {
    super();
    this.state = {
      cphoto: null,
      curl: null,
      cname: null,
      cnickname: null,
      vcphoto: null,
      vcurl: null,
      vcname: null,
      vcnickname: null
    }
  };
  render()  {
    return(
      <div class="col-md-3">
        <div class="panel panel-default" >
          <div class="panel-body">
            <div class="head">
              <img src={this.state.cphoto} alt="">
              <h3><strong>{this.state.cname}</strong></h3>
              <div class="g-plusone" data-size="tall" data-href="https://wikikandidat.com/{this.state.curl}" data-annotation="inline"></div>
            </div>
          </div>
        </div>

        <h5><strong>Ceritakan pengalaman pribadi kamu dengan {this.state.cnickname}, bisa sebagai tetangganya, keluarganya, rekan kerjanya, warga daerah yang pernah dia pimpin, atau apapun.</strong></h5>
        <div class="fb-comments" data-href="https://wikikandidat.com/{this.state.curl}" data-width="335" data-numposts="2"></div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-default" >
          <div class="panel-body">
            <div class="head">
              <img src={this.state.vcphoto} alt="">
              <h3><strong>{this.state.vcname}</strong></h3>
              <div class="g-plusone" data-size="tall" data-href="https://wikikandidat.com/{this.state.curl}" data-annotation="inline"></div>
            </div>
          </div>
        </div>

        <h5><strong>Ceritakan pengalaman pribadi kamu dengan {this.state.vcnickname}, bisa sebagai tetangganya, keluarganya, rekan kerjanya, warga daerah yang pernah dia pimpin, atau apapun.</strong></h5>
        <div class="fb-comments" data-href="https://wikikandidat.com/{this.state.vcurl}" data-width="335" data-numposts="2"></div>
      </div>
    );
  }
};

var candidate1 = Candidate1;
