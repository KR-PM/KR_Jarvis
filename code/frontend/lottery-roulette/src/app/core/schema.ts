export type Maybe<T> = T | null;
export type InputMaybe<T> = Maybe<T>;
export type Exact<T extends { [key: string]: unknown }> = { [K in keyof T]: T[K] };
export type MakeOptional<T, K extends keyof T> = Omit<T, K> & { [SubKey in K]?: Maybe<T[SubKey]> };
export type MakeMaybe<T, K extends keyof T> = Omit<T, K> & { [SubKey in K]: Maybe<T[SubKey]> };
/** All built-in and custom scalars, mapped to their actual values */
export type Scalars = {
  ID: string;
  String: string;
  Boolean: boolean;
  Int: number;
  Float: number;
  Date: any;
  DateTime: any;
};

export type Announcement = {
  __typename?: 'Announcement';
  /**  content  */
  content?: Maybe<Scalars['String']>;
  /**  end time  */
  endTime?: Maybe<Scalars['DateTime']>;
  /**  ID  */
  id: Scalars['ID'];
  /**  is important  */
  isImportant: Scalars['Boolean'];
  /**  is popup  */
  isPopup: Scalars['Boolean'];
  /**  is show in announce page  */
  isShowInAnnouncePage: Scalars['Boolean'];
  /**  is show scrolling text  */
  isShowScrollingText: Scalars['Boolean'];
  /**  order  */
  order?: Maybe<Scalars['Int']>;
  /**  start time  */
  startTime?: Maybe<Scalars['DateTime']>;
  /**  tag  */
  tag?: Maybe<Scalars['String']>;
  /**  title  */
  title?: Maybe<Scalars['String']>;
};

/** A paginated list of Announcement items. */
export type AnnouncementPaginator = {
  __typename?: 'AnnouncementPaginator';
  /** A list of Announcement items. */
  data: Array<Announcement>;
  /** Pagination information about the list of items. */
  paginatorInfo: PaginatorInfo;
};

export type Banner = {
  __typename?: 'Banner';
  /** destination URL */
  destinationUrl?: Maybe<Scalars['String']>;
  /** end time */
  endTime?: Maybe<Scalars['DateTime']>;
  /** ID */
  id: Scalars['ID'];
  /** image URL */
  imgUrl?: Maybe<Scalars['String']>;
  /** mobile image URL */
  mobileImgUrl?: Maybe<Scalars['String']>;
  /** name */
  name: Scalars['String'];
  /** order by asc */
  order?: Maybe<Scalars['Int']>;
  /** start time */
  startTime?: Maybe<Scalars['DateTime']>;
};

/** A paginated list of Banner items. */
export type BannerPaginator = {
  __typename?: 'BannerPaginator';
  /** A list of Banner items. */
  data: Array<Banner>;
  /** Pagination information about the list of items. */
  paginatorInfo: PaginatorInfo;
};

export type DrawName = {
  __typename?: 'DrawName';
  /** id */
  id: Scalars['ID'];
  /** name */
  name: Scalars['String'];
};

/**  Input for login  */
export type LoginInput = {
  /**  account  */
  account: Scalars['String'];
  /**  password  */
  password: Scalars['String'];
};

export type LoginResult = {
  __typename?: 'LoginResult';
  /**  token for login  */
  token: Scalars['String'];
};

export type LogoutResult = {
  __typename?: 'LogoutResult';
  /**  success or not  */
  success: Scalars['Boolean'];
};

export type Mutation = {
  __typename?: 'Mutation';
  /**  draw  */
  draw?: Maybe<DrawName>;
  /**  login  */
  login?: Maybe<LoginResult>;
  /**  logout  */
  logout?: Maybe<LogoutResult>;
};


export type MutationLoginArgs = {
  input: LoginInput;
};

/** Allows ordering a list of records. */
export type OrderByClause = {
  /** The column that is used for ordering. */
  column: Scalars['String'];
  /** The direction that is used for ordering. */
  order: SortOrder;
};

/** Aggregate functions when ordering by a relation without specifying a column. */
export enum OrderByRelationAggregateFunction {
  /** Amount of items. */
  Count = 'COUNT'
}

/** Aggregate functions when ordering by a relation that may specify a column. */
export enum OrderByRelationWithColumnAggregateFunction {
  /** Average. */
  Avg = 'AVG',
  /** Amount of items. */
  Count = 'COUNT',
  /** Maximum. */
  Max = 'MAX',
  /** Minimum. */
  Min = 'MIN',
  /** Sum. */
  Sum = 'SUM'
}

/** Information about pagination using a Relay style cursor connection. */
export type PageInfo = {
  __typename?: 'PageInfo';
  /** Number of nodes in the current page. */
  count: Scalars['Int'];
  /** Index of the current page. */
  currentPage: Scalars['Int'];
  /** The cursor to continue paginating forwards. */
  endCursor?: Maybe<Scalars['String']>;
  /** When paginating forwards, are there more items? */
  hasNextPage: Scalars['Boolean'];
  /** When paginating backwards, are there more items? */
  hasPreviousPage: Scalars['Boolean'];
  /** Index of the last available page. */
  lastPage: Scalars['Int'];
  /** The cursor to continue paginating backwards. */
  startCursor?: Maybe<Scalars['String']>;
  /** Total number of nodes in the paginated connection. */
  total: Scalars['Int'];
};

/** Information about pagination using a fully featured paginator. */
export type PaginatorInfo = {
  __typename?: 'PaginatorInfo';
  /** Number of items in the current page. */
  count: Scalars['Int'];
  /** Index of the current page. */
  currentPage: Scalars['Int'];
  /** Index of the first item in the current page. */
  firstItem?: Maybe<Scalars['Int']>;
  /** Are there more pages after this one? */
  hasMorePages: Scalars['Boolean'];
  /** Index of the last item in the current page. */
  lastItem?: Maybe<Scalars['Int']>;
  /** Index of the last available page. */
  lastPage: Scalars['Int'];
  /** Number of items per page. */
  perPage: Scalars['Int'];
  /** Number of total available items. */
  total: Scalars['Int'];
};

export type Query = {
  __typename?: 'Query';
  /**  get announcement by id  */
  announcement?: Maybe<Announcement>;
  /**  announcements  */
  announcements: AnnouncementPaginator;
  /**  banners  */
  banners: BannerPaginator;
  /**  draw name list  */
  draw_names?: Maybe<Array<Maybe<DrawName>>>;
  /**  current user info  */
  me?: Maybe<User>;
};


export type QueryAnnouncementArgs = {
  id: Scalars['ID'];
};


export type QueryAnnouncementsArgs = {
  first?: Scalars['Int'];
  page?: InputMaybe<Scalars['Int']>;
};


export type QueryBannersArgs = {
  first?: Scalars['Int'];
  page?: InputMaybe<Scalars['Int']>;
};

/** Information about pagination using a simple paginator. */
export type SimplePaginatorInfo = {
  __typename?: 'SimplePaginatorInfo';
  /** Number of items in the current page. */
  count: Scalars['Int'];
  /** Index of the current page. */
  currentPage: Scalars['Int'];
  /** Index of the first item in the current page. */
  firstItem?: Maybe<Scalars['Int']>;
  /** Are there more pages after this one? */
  hasMorePages: Scalars['Boolean'];
  /** Index of the last item in the current page. */
  lastItem?: Maybe<Scalars['Int']>;
  /** Number of items per page. */
  perPage: Scalars['Int'];
};

/** Directions for ordering a list of records. */
export enum SortOrder {
  /** Sort records in ascending order. */
  Asc = 'ASC',
  /** Sort records in descending order. */
  Desc = 'DESC'
}

/** Specify if you want to include or exclude trashed results from a query. */
export enum Trashed {
  /** Only return trashed results. */
  Only = 'ONLY',
  /** Return both trashed and non-trashed results. */
  With = 'WITH',
  /** Only return non-trashed results. */
  Without = 'WITHOUT'
}

export type User = {
  __typename?: 'User';
  /**  account  */
  account: Scalars['String'];
  /**  age  */
  age?: Maybe<Scalars['Int']>;
  /**  email  */
  email?: Maybe<Scalars['String']>;
  /**  ID  */
  id: Scalars['ID'];
  /**  job  */
  job?: Maybe<Scalars['Int']>;
  /**  name  */
  name?: Maybe<Scalars['String']>;
  /**  phone  */
  phone?: Maybe<Scalars['String']>;
};
