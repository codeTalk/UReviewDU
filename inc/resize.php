    <?
    /*
    * Class: SimpleImage, Author: Simon Jarvis, Copyright: 2006 Simon Jarvis, Date: 08/11/06
    * Link: http://www.white-hat-web-design.co.uk/articles/php-image-resizing.php
    * See the GNU General Public License for more details: http://www.gnu.org/licenses/gpl.html
    */
    
    class SimpleImage {
       var $image;
       var $image_type;
    
       function load($filename) {
          $image_info = getimagesize($filename);
          $this->image_type = $image_info[2];
          if( $this->image_type == IMAGETYPE_JPEG ) {
             $this->image = imagecreatefromjpeg($filename);
          } elseif( $this->image_type == IMAGETYPE_GIF ) {
             $this->image = imagecreatefromgif($filename);
          } elseif( $this->image_type == IMAGETYPE_PNG ) {
             $this->image = imagecreatefrompng($filename);
          }
       }
       function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
          if( $image_type == IMAGETYPE_JPEG ) {
             imagejpeg($this->image,$filename,$compression);
          } elseif( $image_type == IMAGETYPE_GIF ) {
             imagegif($this->image,$filename);
          } elseif( $image_type == IMAGETYPE_PNG ) {
             imagepng($this->image,$filename);
          }
          if( $permissions != null) {
             chmod($filename,$permissions);
          }
       }
       function output($image_type=IMAGETYPE_JPEG) {
          if( $image_type == IMAGETYPE_JPEG ) {
             imagejpeg($this->image);
          } elseif( $image_type == IMAGETYPE_GIF ) {
             imagegif($this->image);
          } elseif( $image_type == IMAGETYPE_PNG ) {
             imagepng($this->image);
          }
       }
       function getWidth() {
          return imagesx($this->image);
       }
       function getHeight() {
          return imagesy($this->image);
       }
       function resizeToHeight($height) {
          $ratio = $height / $this->getHeight();
          $width = $this->getWidth() * $ratio;
          $this->resize($width,$height);
       }
       function resizeToWidth($width) {
          $ratio = $width / $this->getWidth();
          $height = $this->getheight() * $ratio;
          $this->resize($width,$height);
       }
       function scale($scale) {
          $width = $this->getWidth() * $scale/100;
          $height = $this->getheight() * $scale/100;
          $this->resize($width,$height);
       }
       function resize($width,$height) {
          $new_image = imagecreatetruecolor($width, $height);
          imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
          $this->image = $new_image;
       }
    }
    // End of SimpleImage class
    
    /* Directory Listing
    Source : http://www.spoono.com/php/tutorials/tutorial.php?id=10
    */
    
    // Define the path as relative
    $path = "/home/content/51/6511651/html/SITE/img2";
    
    // Using the opendir function
    $dir_handle = @opendir($path) or die("ERROR: Cannot open  <b>$path</b>");
    
    echo("Directory Listing of $path<br/>");
    
    //running the while loop
    while ($file = readdir($dir_handle))
{
   if($file != "." && $file != "..")
   {
    $image = new SimpleImage();
    $image->load("/img2/new/".$file);
    $image->resize(86,86);
    $image->save("img2/new/s/".$file);
    echo("&bull; $file <br>");
   }
}
    
    //closing the directory
    closedir($dir_handle);
    ?>