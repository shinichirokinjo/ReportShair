    <div class="content">
      <div class="contentHead">
        <h1>Edit my personal information</h1>
      </div>
      <div class="contentBody">
        <section>
          <form action="" method="post">
            <fieldset>
              <div class="field">
                <div class="fieldHead">
                  <label for="id_username">Username</label>
                </div>
                <div class="fieldBody">
                  <input id="id_username" type="text" name="" value="<?=$user['User']['username']?>" />
                </div>
              </div>
              <div class="field">
                <div class="fieldHead">
                  <label for="id_email">Email</label>
                </div>
                <div class="fieldBody">
                  <input id="id_email" type="text" name="" value="<?=$user['User']['email']?>" />
                </div>
              </div>
            </fieldset>
            <div class="action">
              <button type="submit">Save</button>
            </div>
          </form>
        </section>
      </div>
    </div><!-- .report -->
