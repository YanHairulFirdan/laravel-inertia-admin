export interface PaginationLink {
  active: Boolean;
  label: String;
  url: String;
}

export interface PaginationObject {
  current_page: 1;
  data: [];
  first_page_url: String;
  from: Number;
  last_page: Number;
  last_page_url: String;
  links: Array<PaginationLink>;
  next_page_url: String;
  path: String;
  per_page: Number;
  prev_page_url: String;
  to: Number;
  total: Number;
}