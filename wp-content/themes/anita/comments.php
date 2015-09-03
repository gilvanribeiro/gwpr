<?php
echo "<div id='comments'>";
if (have_comments()) {
  echo "<ol id='comentar-lista'>";
  wp_list_comments(array('callback'=>'comentario_site', 'reply_text'=>'Responder'));
  echo "</ol>";
} 

if ('open' == $post->comment_status) {
  echo "<div id='respond'>";
  echo "<span class='titulo'>Comente</span>";
  echo "<div class='cancel-comment-reply'>";
  cancel_comment_reply_link('Cancelar a Resposta para o Comentário.');
  echo "</div>";
  if (get_option('comment_registration') && !$user_ID ) { 
    echo "<p>Você precisa estar <a href='".get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink())."'>logado</a> para deixar um comentário.</p>";
  } else {
    if ($user_ID) { 
      echo "<p>Logado como <a href='".get_option('siteurl')."/wp-admin/profile.php'>".$user_identity."</a>. <a href='".wp_logout_url(get_permalink())."' title='Logout'>Logout &raquo;</a></p>";
    } 
    echo "<form action='".get_option('siteurl')."/wp-comments-post.php' method='post' id='commentform'>";
    if (!$user_ID) { 
      echo "<span class='responder-campo-nome'><label for='author'>Nome:</label><input type='text' class='responder-campo' tabindex='1' value='".$comment_author."' id='author' name='author'></span>";
      echo "<span class='responder-campo-email'><label for='email'>E-Mail:</label><input type='text' class='responder-campo' tabindex='2' value='".$comment_author_email."' id='email' name='email'></span>";
      echo "<span class='responder-campo-site'><label for='url'>Site:</label><input type='text' class='responder-campo' tabindex='3' value='".$comment_author_url."' id='url' name='url'></span>";
    } 
    echo "<span class='responder-campo-comentario'><label for='comment'>Comentário:</label><textarea class='responder-campo' name='comment' id='comment' cols='30' rows='5' tabindex='4'></textarea></span>";
    echo "<input type='submit' name='submit' id='submit' tabindex='5' value='Enviar' />";
    echo "<div class='clearfix'></div>";

    comment_id_fields();
    do_action('comment_form', $post->ID);
    echo "</form>";
  }
  echo "</div>";
}
echo "</div>";
?>