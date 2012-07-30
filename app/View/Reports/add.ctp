    <div class="report content col grid-24">
      <form action="" method="post">
        <header class="reportHead noPhoto">
          <div class="coverPhoto">
            <a class="button uploadCoverPhoto" href="#" title="カバー写真のアップロード">カバー写真のアップロード</a>
          </div>
          <div class="reportInfo clearfix">
            <div class="fieldLeftBox">
              <div class="field">
                <div class="fieldBody">
                  <input class="eventNameField" type="text" name="data[Report][title]" value="" placeholder="イベント名を入力して下さい。" />
                </div>
              </div>
              <div class="field">
                <div class="fieldBody">
                  <select name="data[Report][month]">
                    <option value="">月</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select>月 
                  <select name="data[Report][day]">
                    <option value="">日</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                  </select>日
                </div>
              </div>
              <div class="field">
                <div class="fieldBody">
                  <input class="eventPlaceField" type="text" name="data[Report][place]" value="" placeholder="イベントが行われる場所を入力して下さい。" />
                </div>
              </div>
            </div>
            <div class="fieldRightBox">
              <div class="field">
                <div class="fieldBody">
                  <textarea name="data[Report][body]" cols="30" rows="10"></textarea>
                </div>
              </div>
            </div>
          </div>
        </header>
        <div class="reportBody">
          <p></p>
        </div>
        <footer class="reportFoot">
          <button type="submit">レポートを作成する</button>
        </footer>
      </form>
    </div><!-- .report -->
