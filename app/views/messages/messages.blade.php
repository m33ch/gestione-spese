<div class="ui message transition success <?php echo Session::get('success') ?: 'hidden' ?>">
    <i class="close icon"></i>
    <div class="content">
        {{{ Session::get('success') }}}
    </div>
</div>

<div class="ui message transition error <?php echo Session::get('error') ?: 'hidden' ?>">
    <i class="close icon"></i>
    <div class="content">
        {{{ Session::get('error') }}}
    </div>
</div>

<div class="ui message transition warning <?php echo Session::get('warning') ?: 'hidden' ?>">
    <i class="close icon"></i>
    <div class="content">
        {{{ Session::get('warning') }}}
    </div>
</div>

<div class="ui message transition info <?php echo Session::get('info') ?: 'hidden' ?>">
    <i class="close icon"></i>
    <div class="content">
        {{{ Session::get('info') }}}
    </div>
</div>
