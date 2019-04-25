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
                <h2>Creator :</h2>
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

            <h2>Use of Database :</h2>

              <div align="justify">You may download or use the Database only for internal research purposes. You may not download or use the Database, or any portion thereof, for any use not expressly authorized hereunder without prior written permission from Broad. You may not redistribute the Database or any portion thereof without prior written permission from Broad. You further agree that the Database shall not be used as the basis of a commercial product and that the Database shall not be rewritten or otherwise adapted to circumvent the need for obtaining permission for use of the Database other than as specified herein. No other rights to the Database, or to any computer software, database, copyright, trademark, patent, or other intellectual property rights owned by Broad or any contributor are conferred upon You by implication, estoppel, or otherwise, except as expressly granted herein. You acknowledge that ownership of the Database (including copyright where applicable) will remain with Broad and its contributors.</div>

            <h2>Confidentiality :</h2>

              <div align="justify">You agree to preserve, at all times, the confidentiality of Data pertaining to identifiable Data Subjects. In particular, You shall undertake not to use, or attempt to use the Data to deliberately compromise or otherwise infringe the confidentiality of information on Data Subjects and their right to privacy. For purposes of this Agreement, Data Subject shall mean the person (irrespective of state of health) to whom Data refers and who has been informed of the purpose for which the Data is held and has given his/her informed consent thereto. </div> <br/>

            <h2>Data Protection :</h2>

              <div align="justify">You agree that You shall not analyze or make any use of the Data in such a way that has the potential to: (i) lead to the identification of any Data Subject; or (ii) compromise the anonymity of any Data Subject in any way. </div> <br/>

              <div align="justify">You agree to take all reasonable security precautions to keep the Data confidential, such precautions to be no less onerous than those applied in respect of your own confidential information.</div> <br/>

            <h2>Errors :</h2>

              <div align="justify">You agree to notify Broad of any errors detected in the Data.</div><br/>

            <h2>Publications :</h2>

              <div align="justify">You agree to acknowledge in any work based in whole or part on the Data, the published paper from which the Data derives, the version of the Data, and the role of the Broad in its distribution. You agree to use the acknowledgement wording provided for the relevant Data in its publication. You will also declare in any such work that those who carried out the original analysis and collection of the Data bear no responsibility for the further analysis or interpretation of it. </div><br/>

            <h2>Termination of Agreement :</h2>

              <div align="justify">This Agreement will terminate immediately upon any breach by You. You accept that the changing ethical framework of human genetic research may lead to: (i) alteration of the provisions of this Agreement, in which case Broad shall notify You in writing via electronic mail of such alterations and You may choose to accept such alterations or to terminate this Agreement; or (ii) in extreme circumstances, the withdrawal of this Agreement. </div> <br/>

            <h2>Indemnification and Disclaimer of Warranties : </h2>

              <div align="justify">You are using this Database at Your own risk, and You hereby agree to hold Broad and its contributors and their trustees, directors, officers, employees, and affiliated investigators harmless for any third party claims which may arise from Your download or use of the Database or any portion thereof. The Database is a research database and is provided "as is". Broad does not represent that the Database is free of errors or bugs or suitable for any particular tasks. </div> <br/>

              <div class="alert alert-danger" role="alert" align="justify"><b>ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, NONINFRINGEMENT, OR THE ABSENCE OF LATENT OR OTHER DEFECTS ARE DISCLAIMED. IN NO EVENT SHALL BROAD OR ITS CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS DATABASE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. </b></div>

            <h2>Governing Law : </h2>

              <div align="justify">The terms and conditions herein shall be construed, governed, interpreted, and applied in accordance with the internal laws of the Commonwealth of Massachusetts, U.S.A. Furthermore, by accessing, downloading, or using the Database, You consent to the personal jurisdiction of, and venue in, the state and federal courts within Massachusetts with respect to Your download or use of the Database.</div> <br/>
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
