<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * URI Language Identifier
 *
 * Adds a language identifier prefix to all site_url links
 *
 * @copyright     Copyright (c) 2011, Wiredesignz
 * @version         0.24
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
class MY_Pagination extends CI_Pagination {
	var $total_page = 0; // The total page
	var $query_string = ''; // Use for fetch querystring to url
        var $parrent_tag_open		= '';
        var $parrent_tag_close		= '';
	// --------------------------------------------------------------------

	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	function create_custom_links_cms() {
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0) {
			return '';
		}

		// Fetch querystring to variable
		if (count($_GET) > 0) {
			$get_array = array();
			foreach ($_GET as $key => $value) {
				if ($key != 'per_page') {
					$get_array[] = $key.'='.$value;
				}
			}

			if (count($get_array) > 0) {
				$this->query_string = '?'.implode('&', $get_array);
			}
		}

		$this->num_links = (int) $this->num_links;

		if ($this->num_links < 1) {
			show_error('Your number of links must be a positive number.');
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);
		// Is there only one page? Hm... nothing more to do here then. // Peng edit this code. //
		if ($num_pages == 1) {
			return '';
		}
		$this->total_page = $num_pages;

		// Determine the current page number.
		$CI =& get_instance();

		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE) {
			if ($CI->input->get($this->query_string_segment) != 0) {
				$this->cur_page = $CI->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		} else {
			if ($CI->uri->segment($this->uri_segment) != 0) {
				$this->cur_page = $CI->uri->segment($this->uri_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}

		if (!is_numeric($this->cur_page)) {
			$this->cur_page = 0;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->cur_page >= $this->total_rows) {
			$this->cur_page = ($num_pages - 1) * $this->per_page;
			if ($this->cur_page == 0) {
				$this->cur_page = '';
			}
			redirect($this->base_url.($this->query_string != '' ? $this->query_string.'&'.$this->query_string_segment.'='.$this->cur_page : '?'.$this->query_string_segment.'='.$this->cur_page));
		}

		// Is there only one page? Hm... nothing more to do here then.
		/*if ($num_pages == 1)
		 {
		 return '';
		 }*/

		$uri_page_number = $this->cur_page;
		$this->cur_page = floor(($this->cur_page / $this->per_page) + 1);

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE) {
			$this->base_url = rtrim($this->base_url).($this->query_string != '' ? $this->query_string.'&'.$this->query_string_segment.'=' : '?'.$this->query_string_segment.'=');
			$this->query_string = '';
		} else {
			$this->base_url = rtrim($this->base_url, '/').'/';
		}

		// And here we go...
		$output = '';
                $output .= $this->parrent_tag_open;

		// Render the "First" link
		if ($this->first_link !== FALSE AND $this->cur_page > ($this->num_links + 1)) {
			$first_url = ($this->first_url == '') ? $this->base_url : $this->first_url;
			$output .= $this->first_tag_open.'<a '.$this->anchor_class.'href="'.$first_url.$this->query_string.'" class="prev">'.$this->first_link.'</a>'.$this->first_tag_close;
		} else {
			$output .= $this->first_tag_open.'<a '.$this->anchor_class.'href="#" onclick="return false;" class="current-prev">'.$this->first_link.'</a>'.$this->first_tag_close;
		}

		// Render the "previous" link
		if ($this->prev_link !== FALSE AND $this->cur_page != 1) {
			$i = $uri_page_number - $this->per_page;

			if ($i == 0 && $this->first_url != '') {
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.$this->query_string.'" class="prev">'.$this->prev_link.'</a>'.$this->prev_tag_close;
			} else {
				$i = ($i == 0) ? '' : $this->prefix.$i.$this->suffix;
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$i.$this->query_string.'" class="prev">'.$this->prev_link.'</a>'.$this->prev_tag_close;
			}
		} else {
			$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="#" onclick="return false;" class="current-prev">'.$this->prev_link.'</a>'.$this->prev_tag_close;
		}

		// Render the pages
		if ($this->display_pages !== FALSE) {
			// Write the digit links
			for ($loop = $start - 1; $loop <= $end; $loop++) {
				$i = ($loop * $this->per_page) - $this->per_page;

				if ($i >= 0) {
					if ($this->cur_page == $loop) {
						$output .= $this->cur_tag_open.'<a '.$this->anchor_class.'href="#" class="current" onclick="return false;">'.$loop.'</a>'.$this->cur_tag_close; // Current page
					} else {
						$n = ($i == 0) ? '' : $i;

						if ($n == '' && $this->first_url != '') {
							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.$this->query_string.'">'.$loop.'</a>'.$this->num_tag_close;

						} else {
							$n = ($n == '') ? '' : $this->prefix.$n.$this->suffix;

							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$n.$this->query_string.'">'.$loop.'</a>'.$this->num_tag_close;
						}
					}
				}
			}
		}

		// Render the "next" link
		if ($this->next_link !== FALSE AND $this->cur_page < $num_pages) {
			$output .= $this->next_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.($this->cur_page * $this->per_page).$this->suffix.$this->query_string.'" class="next">'.$this->next_link.'</a>'.$this->next_tag_close;
		} else {
			$output .= $this->next_tag_open.'<a '.$this->anchor_class.'href="#" class="current-next" onclick="return false;">'.$this->next_link.'</a>'.$this->next_tag_close;
		}

		// Render the "Last" link
		if ($this->last_link !== FALSE AND ($this->cur_page + $this->num_links) < $num_pages) {
			$i = (($num_pages * $this->per_page) - $this->per_page);
			$output .= $this->last_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.$this->query_string.'" class="next">'.$this->last_link.'</a>'.$this->last_tag_close;
		} else {
			$output .= $this->last_tag_open.'<a '.$this->anchor_class.'href="#" class="current-next" onclick="return false;">'.$this->last_link.'</a>'.$this->last_tag_close;
		}

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

                $output .= $this->parrent_tag_close;
                
		if ($this->cur_page != '') {
			$output .= '<span class="page_text">หน้า '.$this->cur_page.' จากทั้งหมด '.$this->total_page.' หน้า | พบทั้งหมด '.$this->total_rows.' รายการ</span>'."\n";
		}

		return $output;
	}
	
	function create_custom_links_front() {
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0) {
			return '';
		}

		// Fetch querystring to variable
		if (count($_GET) > 0) {
			$get_array = array();
			foreach ($_GET as $key => $value) {
				if ($key != 'per_page') {
					$get_array[] = $key.'='.$value;
				}
			}

			if (count($get_array) > 0) {
				$this->query_string = '?'.implode('&', $get_array);
			}
		}

		$this->num_links = (int) $this->num_links;

		if ($this->num_links < 1) {
			show_error('Your number of links must be a positive number.');
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);
		// Is there only one page? Hm... nothing more to do here then. // Peng edit this code. //
		if ($num_pages == 1) {
			return '';
		}
		$this->total_page = $num_pages;

		// Determine the current page number.
		$CI =& get_instance();

		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE) {
			if ($CI->input->get($this->query_string_segment) != 0) {
				$this->cur_page = $CI->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		} else {
			if ($CI->uri->segment($this->uri_segment) != 0) {
				$this->cur_page = $CI->uri->segment($this->uri_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}

		if (!is_numeric($this->cur_page)) {
			$this->cur_page = 0;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->cur_page >= $this->total_rows) {
			$this->cur_page = ($num_pages - 1) * $this->per_page;
			if ($this->cur_page == 0) {
				$this->cur_page = '';
			}
			redirect($this->base_url.($this->query_string != '' ? $this->query_string.'&'.$this->query_string_segment.'='.$this->cur_page : '?'.$this->query_string_segment.'='.$this->cur_page));
		}

		// Is there only one page? Hm... nothing more to do here then.
		/*if ($num_pages == 1)
		 {
		 return '';
		 }*/

		$uri_page_number = $this->cur_page;
		$this->cur_page = floor(($this->cur_page / $this->per_page) + 1);

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE) {
			$this->base_url = rtrim($this->base_url).($this->query_string != '' ? $this->query_string.'&'.$this->query_string_segment.'=' : '?'.$this->query_string_segment.'=');
			$this->query_string = '';
		} else {
			$this->base_url = rtrim($this->base_url, '/').'/';
		}

		// And here we go...
		$output = '';
                $output .= $this->parrent_tag_open;

		// Render the "First" link
		/*if ($this->first_link !== FALSE AND $this->cur_page > ($this->num_links + 1)) {
			$first_url = ($this->first_url == '') ? $this->base_url : $this->first_url;
			$output .= $this->first_tag_open.'<a '.$this->anchor_class.'href="'.$first_url.$this->query_string.'" class="prev">'.$this->first_link.'</a>'.$this->first_tag_close;
		} else {
			$output .= $this->first_tag_open.'<a '.$this->anchor_class.'href="#" onclick="return false;" class="current-prev">'.$this->first_link.'</a>'.$this->first_tag_close;
		}*/

		// Render the "previous" link
		if ($this->prev_link !== FALSE AND $this->cur_page != 1) {
			$i = $uri_page_number - $this->per_page;

			if ($i == 0 && $this->first_url != '') {
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.$this->query_string.'" class="prevposts">'.$this->prev_link.'</a>'.$this->prev_tag_close;
			} else {
				$i = ($i == 0) ? '' : $this->prefix.$i.$this->suffix;
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$i.$this->query_string.'" class="prevposts">'.$this->prev_link.'</a>'.$this->prev_tag_close;
			}
		} else {
			$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="#" onclick="return false;" class="current-prev">'.$this->prev_link.'</a>'.$this->prev_tag_close;
		}

		// Render the pages
		if ($this->display_pages !== FALSE) {
			// Write the digit links
			for ($loop = $start - 1; $loop <= $end; $loop++) {
				$i = ($loop * $this->per_page) - $this->per_page;

				if ($i >= 0) {
					if ($this->cur_page == $loop) {
						$output .= $this->cur_tag_open.'<a '.$this->anchor_class.'href="#" class="activeposts" onclick="return false;">'.$loop.'</a>'.$this->cur_tag_close; // Current page
					} else {
						$n = ($i == 0) ? '' : $i;

						if ($n == '' && $this->first_url != '') {
							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.$this->query_string.'" class="inactiveposts">'.$loop.'</a>'.$this->num_tag_close;

						} else {
							$n = ($n == '') ? '' : $this->prefix.$n.$this->suffix;

							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$n.$this->query_string.'" class="inactiveposts">'.$loop.'</a>'.$this->num_tag_close;
						}
					}
				}
			}
		}

		// Render the "next" link
		if ($this->next_link !== FALSE AND $this->cur_page < $num_pages) {
			$output .= $this->next_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.($this->cur_page * $this->per_page).$this->suffix.$this->query_string.'" class="nextposts">'.$this->next_link.'</a>'.$this->next_tag_close;
		} else {
			$output .= $this->next_tag_open.'<a '.$this->anchor_class.'href="#" class="nextposts" onclick="return false;">'.$this->next_link.'</a>'.$this->next_tag_close;
		}

		// Render the "Last" link
		/*if ($this->last_link !== FALSE AND ($this->cur_page + $this->num_links) < $num_pages) {
			$i = (($num_pages * $this->per_page) - $this->per_page);
			$output .= $this->last_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.$this->query_string.'" class="next">'.$this->last_link.'</a>'.$this->last_tag_close;
		} else {
			$output .= $this->last_tag_open.'<a '.$this->anchor_class.'href="#" class="current-next" onclick="return false;">'.$this->last_link.'</a>'.$this->last_tag_close;
		}*/

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;
                
                $output .= $this->parrent_tag_close;

		/*if ($this->cur_page != '') {
			$output .= '<br><br><span class="page_text">หน้า '.$this->cur_page.' จากทั้งหมด '.$this->total_page.' หน้า | พบทั้งหมด '.$this->total_rows.' รายการ</span>'."\n";
		}*/

		return $output;
	}
}
