    <aside class="sidebar">
      <section class="widget">
        <div class="widgetBody">
          <ul>
            <li><a href="/users/<?=$user['User']['username']?>"><?=__('View Profile')?></a></li>
            <li><a href="/settings/account"><?=__('Account')?></a></li>
            <li><a href="/settings/password"><?=__('Password')?></a></li>
            <li><a href="/settings/notifications"><?=__('Notifications')?></a></li>
            <li><a href="/settings/profile"><?=__('Profile')?></a></li>
          </ul>
        </div>
      </section><!-- .widget -->
    </aside>
    <div class="content">
      <header class="contentHead">
        <h1><?=__('Settings')?></h1>
      </header>
      <div class="contentBody">
<?php if($this->Session->check('Message.flash')): ?>
<?php echo $this->Session->flash(); ?>
<?php endif; ?>
        <form action="" method="post" accept-charset="utf-8">
          <div style="display: hidden;">
            <input type="hidden" name="_method" value="POST" />
            <input type="hidden" name="data[_Token][key]" value="<?=$this->Session->read('_Token.key')?>" />
          </div>

          <fieldset>
            <div class="field">
              <div class="fieldHead">
                <label for="id_username"><?=__('Username')?>:</label>
              </div>
              <div class="fieldBody">
                <input id="id_username" type="text" name="data[User][username]" value="<?=$user['User']['username']?>" maxlength="50" disabled="disabled" />
                <p class="caption"><?=__('Your username is not changed.')?></p>
              </div>
            </div><!-- .field -->
            <div class="field">
              <div class="fieldHead">
                <label for="id_email"><?=__('Email')?>:</label>
              </div>
              <div class="fieldBody">
                <input id="id_email" type="email" name="data[User][email]" value="<?=$user['User']['email']?>" />
              </div>
            </div><!-- .field -->
            <div class="field">
              <div class="fieldHead">
                <label for="id_facebook_link"><?=__('Facebook Link')?>:</label>
              </div>
              <div class="fieldBody">
                <input id="id_facebook_link" type="text" name="data[User][facebook_link]" value="<?=$user['User']['facebook_link']?>" disabled="disabled" />
              </div>
            </div><!-- .field -->
            <div class="field">
              <div class="fieldHead">
                <label for="id_twitter_id"><?=__('Twitter ID')?>:</label>
              </div>
              <div class="fieldBody">
                <input id="id_twitter_id" type="text" name="data[User][twitter_id]" value="<?=$user['User']['twitter_id']?>" />
              </div>
            </div><!-- .field -->
            <div class="field">
              <div class="fieldHead">
                <label for="id_website_link"><?=__('Website')?>:</label>
              </div>
              <div class="fieldBody">
                <input id="id_website_link" type="text" name="data[User][website_link]" value="<?=$user['User']['website_link']?>" />
              </div>
            </div><!-- .field -->
            <div class="field">
              <div class="fieldHead">
                <label for="id_profile"><?=__('Profile')?>:</label>
              </div>
              <div class="fieldBody">
                <textarea id="id_profile" name="data[User][profile]"><?=$user['User']['profile']?></textarea>
              </div>
            </div><!-- .field -->
            <div class="field">
              <div class="fieldHead">
                <label for="id_language"><?=__('Language')?>:</label>
              </div>
              <div class="fieldBody">
                <select id="id_language" name="data[User][language]">
                  <option value=""><?=__('Select below')?></option>
                  <option value="english"<?php if ($user['User']['language'] == 'english') echo ' selected="selected"'; ?>><?=__('English')?></option>
                  <option value="japanese"<?php if ($user['User']['language'] == 'japanese') echo ' selected="selected"'; ?>><?=__('Japanese')?></option>
                </select>
              </div>
            </div><!-- .field -->
          </fieldset>

          <div class="action">
            <button type="submit"><?=__('Save')?></button>
          </div>
<?=$this->Form->secure()?>
        </form>
      </div>
    </div><!-- .content -->
