@section('content')

<div class="content-wrapper">
  <div class="container">


    <ul class="nav nav-tabs" id="myTab">
    <!-- <ul class="nav nav-pills" id="myTab"> -->
      <li class="active"><a data-toggle="tab" href="#menu01">Paper/How to cite us</a></li>
      <li><a data-toggle="tab" href="#menu02">How to use</a></li>
      <li><a data-toggle="tab" href="#menu03">Terms of Access</a></li>
      <li><a data-toggle="tab" href="#menu04">Investigators</a></li>
    </ul>

    <div class="tab-content" id="myTabContent">

        <!-- Paper menu -->
        <div id="menu01" class="tab-pane fade active in">
            <div class="jumbotron">
              <h1 class="text-center">How to cite us</h1>
              <div align="justify">Cellection : description of website
                <h2>This website is the property of :</h2>
                <div>Researcher :</div>
                <div>Director of publications :</div>
              </div>
            </div>
        </div>


        <!-- How to use menu -->
        <div id="menu02" class="tab-pane fade">
            <div class="jumbotron">
              <h1 class="text-center">How to use</h1>
              <div align="justify">
                <a href="http://cellection.univ-lyon1.fr"><b>Cell'ection</b></a> is an online database combining transcriptomic data, annotation by gene symbols and pathway analysis for the most commonly used cell lines in breast cancer research, allowing each request to link to all relevant information.
 </br>
                <blockquote class="blockquote" id="prerequisities">
                  <h3>Prerequisites</h3>
                  We recommend you use Google Chrome or Firefox for this website.
                </blockquote>
              <h2>Requests</h2>
              When you are on the index page, scroll down the page by clicking on the arrow or manually. A search bar is provided on the bottom of the index page. You may search by gene symbol, geneset, or cell line name.


              <div align="center"><img class="img-responsive" src="/img/structure.png"/></div>
              <br />
              Result pages aggregate several types of data and present it in an easily exploitable manner in a user friendly interface.
              <li id="itemize">
                Cell line queries (for example: HCC38) return molecular classification and dataset of origin for each replicate, expression levels for each gene symbol and GSEA results for each pathway
              </li>
              <li id="itemize">
                Geneset queries (for example: GLI1→ attention je crois que c’est le nom d’un gène ?) return the list of genes it contains, and enrichment results for all cell lines
              </li>
              <li id="itemize">
                Gene symbol queries (for example: TPD52) return the list of pathways it is involved in, and its expression levels in all cell lines
              </li>

              </div>
            </div>
        </div>

        <!-- Terms of Access menu -->
        <div id="menu03" class="tab-pane fade">
          <div class="jumbotron">
            <h1 class="text-center">Terms of Access</h1>
              <div align="justify">Welcome to <b>Cell'ection</b>. The information and materials ("Data") made available on this <a href="http://cellection.univ-lyon1.fr/" target="_blanck">web site</a>, including the database of cancer cell lines genomic profiles and mutations (referred to collectively herein as the "Database") are made available to you (and your employing entity, where the download or use is within the scope of your employment by such entity- collectively "You") solely for internal research purposes. By accessing and viewing this Database, You agree to the following terms and conditions.</div> <br/>

            <h2>Copyright :</h2>

              <div align="justify"> The whole of this website is under french legislation about copyright and intellectual property. All rights reserved, including downloadable and iconographic content. Complete or partial reproduction of this website is strictly forbidden, except with express accord of the Directeur de publication. See "Paper/How to cite us" at the top of this menu.</div>

            <h2>Hyperlinks :</h2>

              <div align="justify"> Informations displayed on this website may contains hyperlinks directing to other website. Those website are not supported by this Terms of Access, and are accessible at your own risk. </div> <br/>

            <h2>Data Protection :</h2>

              <div align="justify">You agree that You shall not analyze or make any use of the Data in such a way that has the potential to: (i) lead to the identification of any Data Subject; or (ii) compromise the anonymity of any Data Subject in any way. </div> <br/>

              <div align="justify">You agree to take all reasonable security precautions to keep the Data confidential, such precautions to be no less onerous than those applied in respect of your own confidential information.</div> <br/>

            <h2>Publications :</h2>

              <div align="justify">You agree to acknowledge in any work based in whole or part on the Data, the published paper from which the Data derives, the version of the Data, and the role of the authors in its distribution. You agree to use the acknowledgement wording provided for the relevant Data in its publication. You will also declare in any such work that those who carried out the original analysis and collection of the Data bear no responsibility for the further analysis or interpretation of it. </div><br/>

            <h2>Indemnification and Disclaimer of Warranties : </h2>

              <div align="justify">You are using this Database at Your own risk, and You hereby agree to hold tha authors, its contributors and their trustees, directors, officers, employees, and affiliated investigators harmless for any third party claims which may arise from Your download or use of the Database or any portion thereof. The Database is a research database and is provided "as is". The author does not represent that the Database is free of errors or bugs or suitable for any particular tasks. </div> <br/>

              <div class="alert alert-danger" role="alert" align="justify"><b>ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, NONINFRINGEMENT, OR THE ABSENCE OF LATENT OR OTHER DEFECTS ARE DISCLAIMED. IN NO EVENT SHALL THE AUTHOR OR ITS CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS DATABASE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. </b></div>

          </div>
        </div>


        <!-- Investigators menu -->
        <div id="menu04" class="tab-pane fade">
            <div class="jumbotron">
              <h1 class="text-center">Investigators</h1> </br>
              <div class="col-md-12" id="investigators">
                <div class="col-xs-6 col-sm-4 text-center">
                  <p id="investigator"> Konstantinn Bonnet </br> </p>
                  <p id="investigator"> Sylvain Picard </br> </p>
                  <p id="investigator"> François Ducray </br> </p>
                  <p id="investigator"> Victor Goubet </br> </p>
                </div>
                <div class="col-xs-6 col-sm-4 text-center">
                  <p id="investigator"> Claire Bardel </br> </p>
                  <p id="investigator"> Mathieu Gabut </br> </p>
                  <p id="investigator"> David Meyronet </br> </p>
                  <p id="investigator"> Thomas Catel </br> </p>
                </div>
                <div class="col-xs-6 col-sm-4 text-center">
                  <p id="investigator"> Marc Barritault </br> </p>
                  <p id="investigator"> Marianne Taupin </br> </p>
                  <p id="investigator"> Lélia Debornes </br> </p>
                  <p id="investigator"> Emilie Gérard-Marchant </br> </p>
                </div>
              </div>
            </div>
        </div>
  </div>
</div>

@stop
